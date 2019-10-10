<?php

namespace AllBlacks\Repositories;

use AllBlacks\Models\EmailSent;
use AllBlacks\Mail\SendMailClient;
use App\Exports\ClientsExport;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use AllBlacks\Models\Client;

/**
 * Class ClientRepositoryEloquent.
 *
 * @package namespace AllBlacks\Repositories;
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function import($request)
    {
        // If is a XML import
        if (!empty($request->files->get('file'))) {

            $clients = simplexml_load_file($request->files->get('file'));
            $clients = json_decode(json_encode((array)$clients), true);

            $file = $request->file('file');
            $file->move(storage_path('client/import'), time() . '.xml');

            $this->export('1570735286.xml');

            $created = 0;
            $updated = 0;
            $total = 0;

            foreach ($clients['torcedor'] as $client) {

                $resource = [
                    'name' => $client['@attributes']['nome'],
                    'document' => $client['@attributes']['documento'],
                    'postcode' => $client['@attributes']['cep'],
                    'address' => $client['@attributes']['endereco'],
                    'district' => $client['@attributes']['bairro'],
                    'city' => $client['@attributes']['cidade'],
                    'state' => $client['@attributes']['uf'],
                    'telephone' => $client['@attributes']['telefone'],
                    'email' => $client['@attributes']['email'],
                    'active' => $client['@attributes']['ativo'] ? 1 : 0,
                ];

                $data = $this->findWhere([
                    ['document', '=', $client['@attributes']['documento']],
                ])->first();

                $request->replace($resource);

                if (isset($data->document)) {
                    $request->validate([
                        'name' => 'required',
                        'document' => 'required',
                        'postcode' => 'required',
                        'address' => 'required',
                        'district' => 'required',
                        'city' => 'required',
                        'state' => 'required',
                    ]);

                    $this->firstOrCreate($resource);
                    $updated += 1;
                }

                if (!isset($data->document)) {
                    $request->validate([
                        'name' => 'required',
                        'document' => 'required|unique:clients',
                        'postcode' => 'required',
                        'address' => 'required',
                        'district' => 'required',
                        'city' => 'required',
                        'state' => 'required'
                    ]);

                    $this->create($resource);
                    $created += 1;
                }

                $total++;
            }

            return ['total' => $total, 'updated' => $updated, 'created' => $created];

        }
    }

    /**
     * Export clients to a Excel file.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export($file)
    {
        return Storage::download('1570735506.xml');
    }

}

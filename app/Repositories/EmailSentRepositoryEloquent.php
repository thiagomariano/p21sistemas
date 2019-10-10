<?php

namespace AllBlacks\Repositories;

use AllBlacks\Mail\SendMailClient;
use AllBlacks\Models\Client;
use AllBlacks\Models\EmailSent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class ClientRepositoryEloquent.
 *
 * @package namespace AllBlacks\Repositories;
 */
class EmailSentRepositoryEloquent extends BaseRepository implements EmailSentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EmailSent::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function sendMail($id)
    {
        $enviados = $this->sendMailClient($id);
        $data['submissions'] = $enviados;
        $data['date'] = Carbon::now();
        parent::update($data, $id);
    }

    public function sendMailClient($id)
    {
        $email = parent::find($id);
        $clients = Client::where('active', '=', 1)->where('email', '!=', '')->get();

        $clientMail = [];
        foreach ($clients as $data) {
            $clientMail[] = $data->email;
        }

        $sent = 0;
        foreach ($clientMail as $client) {
            $sent++;
        }
        Mail::to(['thiagomarianodamasceho@gmail.com'])->send(new SendMailClient($email));

        return $sent;
    }
}

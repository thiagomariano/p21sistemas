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
        $sent = 0;
        foreach ($clients as $data) {
            $clientMail[] = $data->email;
            $sent++;
        }

        #o email está dando erro ao disparar muitos de uma vez, por isso coloquei só 1
        # testei no mailtrap e no google e deu o mesmo problema
        Mail::to(['thiagomarianodamasceho@gmail.com'])->send(new SendMailClient($email));

        return $sent;
    }
}

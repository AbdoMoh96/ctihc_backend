<?php

namespace App\Services\Client;
use App\Models\Message;

class MessageService {

    public function storeClientMessage($data){
       $message = new Message();
       $message->name = $data->name;
       $message->email = $data->email;
       $message->mobile = $data->mobile;
       $message->subject = $data->subject;
       $message->message = $data->message;
       $message->save();
       return $message;
    }
}

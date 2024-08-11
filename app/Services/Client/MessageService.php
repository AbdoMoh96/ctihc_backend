<?php

namespace App\Services\Client;
use App\Models\Message;
use App\Events\MessageStored;

class MessageService {

    public function storeClientMessage($data){
       $message = new Message();
       $message->name = $data->name;
       $message->email = $data->email;
       $message->mobile = $data->mobile;
       $message->subject = $data->subject;
       $message->body = $data->body;
       $message->save();
       event(new MessageStored($message));
       return $message;
    }
}

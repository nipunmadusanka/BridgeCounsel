<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Models\Mychats as MychatModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class HomeControler extends Controller
{
    //
    public function blogPage()
    {
        return view('webfront.Blog.index');
    }

    public function aboutPage()
    {
        return view('webfront.About.index');
    }

    // public function viewMyChat($id)
    // {
    //     if (Auth::check()) {
    //         $userId = Auth::id();
    //         $users = UserModel::all();
    //         $userdetails = UserModel::where('id', $id)->first();
    //         $chats = MychatModel::where(function ($query) use ($userId, $id) {
    //             $query->where('senderid', $userId)
    //                 ->where('receiveid', $id);
    //         })->orWhere(function ($query) use ($userId, $id) {
    //             $query->where('receiveid', $userId)
    //                 ->where('senderid', $id);
    //         })->get();

    //         return view('chat', [
    //             'users' => $users,
    //             'senderid' => $id,
    //             'getchat' => $chats,
    //             'userdetails' => $userdetails
    //         ]);
    //     } else {
    //         return redirect('/');
    //     }
    // }

    // public function viewMyChat($id)
    // {
    //     if (Auth::check()) {
    //         $userId = Auth::id();
    //         $users = UserModel::all();
    //         $userdetails = UserModel::where('id', $id)->first();

    //         $chats = MychatModel::where(function ($query) use ($userId, $id) {
    //             $query->where('senderid', $userId)
    //                 ->where('receiveid', $id);
    //         })->orWhere(function ($query) use ($userId, $id) {
    //             $query->where('receiveid', $userId)
    //                 ->where('senderid', $id);
    //         })->get();

    //         // Decrypt each message
    //         foreach ($chats as $chat) {
    //             $chat->message = Crypt::decryptString($chat->message);
    //         }

    //         return view('chat', [
    //             'users' => $users,
    //             'senderid' => $id,
    //             'getchat' => $chats,
    //             'userdetails' => $userdetails
    //         ]);
    //     } else {
    //         return redirect('/');
    //     }
    // }

    // public function postChat(Request $request)
    // {
    //     $my_id = Auth::id();
    //     $data = json_decode($request->getContent(), true);
    //     $mychat = $data['mychat'];
    //     $receiveid = $data['senderid'];
    //     MychatModel::create([
    //         'senderid' => $my_id,
    //         'receiveid' => $receiveid,
    //         'message' => $mychat,
    //     ]);
    //     return redirect()->back();
    // }

    // public function postChat(Request $request)
    // {
    //     $my_id = Auth::id();
    //     $data = json_decode($request->getContent(), true);
    //     $encryptedChat = $data['mychat'];
    //     $receiveid = $data['senderid'];

    //     // Decrypt the message received from the client
    //     $mychat = $this->decryptMessage($encryptedChat);

    //     // dd($mychat);
    //     // Encrypt the message before storing it in the database
    //     $encryptedChatForStorage = Crypt::encryptString($mychat);

    //     MychatModel::create([
    //         'senderid' => $my_id,
    //         'receiveid' => $receiveid,
    //         'message' => $encryptedChatForStorage,
    //     ]);

    //     return redirect()->back();
    // }

    // private function decryptMessage($encryptedMessage)
    // {
    //     $appKey = config('app.key');
    //     $decrypted = openssl_decrypt(base64_decode($encryptedMessage), 'AES-256-CBC', $appKey, 0, substr($appKey, 0, 16));
    //     return $decrypted;
    // }

    public function postChat(Request $request)
    {
        $my_id = Auth::id();
        $data = json_decode($request->getContent(), true);
        $mychat = $data['mychat'];
        $receiveid = $data['senderid'];

        // Encrypt the message before storing it in the database
        $encryptedChatForStorage = Crypt::encryptString($mychat);

        MychatModel::create([
            'senderid' => $my_id,
            'receiveid' => $receiveid,
            'message' => $encryptedChatForStorage,
        ]);

        return redirect()->back();
    }

    public function viewMyChat($id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $users = UserModel::all();
            $userdetails = UserModel::where('id', $id)->first();

            $chats = MychatModel::where(function ($query) use ($userId, $id) {
                $query->where('senderid', $userId)
                    ->where('receiveid', $id);
            })->orWhere(function ($query) use ($userId, $id) {
                $query->where('receiveid', $userId)
                    ->where('senderid', $id);
            })->get();

            // Decrypt each message
            foreach ($chats as $chat) {
                $chat->message = Crypt::decryptString($chat->message);
            }

            return view('chat', [
                'users' => $users,
                'senderid' => $id,
                'getchat' => $chats,
                'userdetails' => $userdetails
            ]);
        } else {
            return redirect('/');
        }
    }


    // public function postChat(Request $request)
    // {
    //     $my_id = Auth::id();
    //     $data = json_decode($request->getContent(), true);
    //     $encryptedChat = $data['mychat'];
    //     $receiveid = $data['senderid'];

    //     // Decrypt the message received from the client
    //     $mychat = $this->decryptMessage($encryptedChat);

    //     // Encrypt the message before storing it in the database
    //     $encryptedChatForStorage = Crypt::encryptString($mychat);

    //     MychatModel::create([
    //         'senderid' => $my_id,
    //         'receiveid' => $receiveid,
    //         'message' => $encryptedChatForStorage,
    //     ]);

    //     return redirect()->back();
    // }

    // private function decryptMessage($encryptedMessage)
    // {
    //     // Specify the encryption key
    //     $encryptionKey = 'nipun1234567890';

    //     // Convert the key to 32 bytes for AES-256-CBC
    //     $encryptionKey = substr(hash('sha256', $encryptionKey, true), 0, 32);

    //     // Get the IV length
    //     $ivLength = openssl_cipher_iv_length('AES-256-CBC');

    //     // Extract the IV from the encrypted message
    //     $iv = substr(base64_decode($encryptedMessage), 0, $ivLength);

    //     // Extract the encrypted message (excluding the IV)
    //     $encryptedData = substr(base64_decode($encryptedMessage), $ivLength);

    //     // Decrypt using AES-256-CBC
    //     $decrypted = openssl_decrypt($encryptedData, 'AES-256-CBC', $encryptionKey, OPENSSL_RAW_DATA, $iv);

    //     // Return the decrypted message
    //     return $decrypted;
    // }


    // public function viewMyChat($id)
    // {
    //     if (Auth::check()) {
    //         $userId = Auth::id();
    //         $users = UserModel::all();
    //         $userdetails = UserModel::where('id', $id)->first();

    //         $chats = MychatModel::where(function ($query) use ($userId, $id) {
    //             $query->where('senderid', $userId)
    //                 ->where('receiveid', $id);
    //         })->orWhere(function ($query) use ($userId, $id) {
    //             $query->where('receiveid', $userId)
    //                 ->where('senderid', $id);
    //         })->get();

    //         // Decrypt each message
    //         foreach ($chats as $chat) {
    //             $chat->message = Crypt::decryptString($chat->message);
    //         }

    //         return view('chat', [
    //             'users' => $users,
    //             'senderid' => $id,
    //             'getchat' => $chats,
    //             'userdetails' => $userdetails
    //         ]);
    //     } else {
    //         return redirect('/');
    //     }
    // }
}

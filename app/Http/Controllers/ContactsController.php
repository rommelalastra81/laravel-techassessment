<?php

namespace App\Http\Controllers;
use App\Models\Contacts;
use App\Models\User;
use App\Http\Requests\contactRequest;

use Illuminate\Http\Request;

class ContactsController extends Controller
{

    public function get_contacts()
    {
        $per_page = 5;
        $contacts = Contacts::Where('is_deleted', 0)->paginate($per_page);;
        return $contacts;
    }

    public function contacts_search($email_or_name)
    {
        $contactSearch = Contacts::with(['name'])
        ->where('name', 'LIKE', "%".$email_or_name."%");
        
        return $contactSearch;
        
    }

    public function add_contact(contactRequest $request)
    {

        $userInfo = User::where('email', $request->creator_email)->first();
        $user_id = $userInfo->id;
        $contacts = Contacts::create([
        'user_id'           => $user_id,
        'name'              => $request->name,
        'email'             => $request->email,
        'company'           => $request->company,
        'phone'             => $request->phone,
        'is_deleted'        => false
        ]);

        return $contacts;
    }

    public function update_contact(Request $request, $id) 
    {
        $updated_contact = Contacts::where('id', $id)->update([
        'name'              => $request->name,
        'email'             => $request->email,
        'company'           => $request->company,
        'phone'             => $request->phone,
        'is_deleted'        => false
        ]);

        return $updated_contact;
    }

    public function delete_contact(Request $request, $id) 
    {
        $deleted_contact = Contacts::where('id', $id)->update([
            'is_deleted' => $request->is_deleted
        ]);

        return $deleted_contact;
    }

}

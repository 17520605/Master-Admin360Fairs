<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactService::getAll();
        $viewData = [
            'contacts'=> $contacts,
        ];

        return view('contact.index', $viewData);
    }

    public function toggleVisiable($id, Request $request)
    {
        $contact = Contact::where('id', $id)->first();
        if(isset($contact)){
            if($contact->status == 0)
            {
                $contact->status = 1;
                $contact->save();
                return [
                    'success' => true,
                    'status' => $contact->status,
                ]; 
            }
            else{
                return [
                    'success' => false,
                    'errors' => 'Bạn đã xử lý vấn đề!'
                ]; 
            }
        }
        else{
            return [
                'success' => false,
                'errors' => 'Thao tác thất bại'
            ]; 
        }
    }


    public function delete($id, Request $request)
    {
        $contact = Contact::where('id', $id)->first();
        if(isset($contact)){
            $contact->delete();
            return [
                'success' => true
            ]; 
        }
        else{
            return [
                'success' => false,
                'errors' => 'Xóa thất bại'
            ]; 
        }
    }

    public function detail($id)
    {
        $contact = Contact::where('id', $id)->first();
        return \response()->json($contact);
    }
}

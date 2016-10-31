<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClientFormRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
        /*
         * allow only related user to update content for example, user attmpting
         * to edit blog comment - does that comment belong to him
         *  $commentId = $this->route('comment');

          return Comment::where('id', $commentId)
          ->where('user_id', Auth::id())->exists();
         */
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            "name" => "required|min:3",
            "address" => "required",
            "phone" => "required",
            "email" => "required|email",
            "address" => "required",
            "nationality" => "required",
            "dob" => "required",
            "education_background" => "required",
            "contact_mode" => "required"
        ];
    }

}

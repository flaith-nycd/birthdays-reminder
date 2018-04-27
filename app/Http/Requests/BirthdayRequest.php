<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BirthdayRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
 /* Example of autorization
  * From https://laracasts.com/discuss/channels/requests/laravel-5-validation-request-how-to-handle-validation-on-update
     public function authorize(Authenticator $auth)
     {
        return $auth->user()->hasRole('administrator');
     }
 */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'nullable|email',
            'date' => 'required|date',
            'day' => 'required|integer|between:1,31',
            'month' => 'required|integer|between:1,12',
            'year' => 'nullable|integer'
        ];
    }
/*
    public function rules()
    {
        $user = User::find($this->users);

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'user.name.first' => 'required',
                    'user.name.last'  => 'required',
                    'user.email'      => 'required|email|unique:users,email',
                    'user.password'   => 'required|confirmed',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'user.name.first' => 'required',
                    'user.name.last'  => 'required',
                    'user.email'      => 'required|email|unique:users,email,'.$user->id,
                    'user.password'   => 'required|confirmed',
                ];
            }
            default:break;
        }
    }
*/
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNasabahRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => [
                'required',
                'string',
                'unique:nasabah,nama',
                'regex:/^(?!.*\b(Profesor|Haji|Hj|Prof)\b)[a-zA-Z\s]+$/',
            ],
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'id_pekerjaan' => 'required|integer|exists:master_pekerjaan,id',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'nama_jalan' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'nama.regex' => 'Nama tidak boleh mengandung angka, simbol, atau gelar seperti Profesor dan Haji.',
            'nominal_setor.numeric' => 'Nominal setor harus berupa angka.',
            'nominal_setor.min' => 'Nominal setor tidak boleh kurang dari 0.',
            'approved_by.integer' => 'Approved by harus berupa ID integer valid.',
        ];
    }
}

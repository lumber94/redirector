<?php

    namespace Lumber94\Redirector\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Validation\Rule;

    /**
     * Class SaveRedirectRequest
     *
     * @package Lumber94\Redirector\Http\Requests
     */
    class SaveRedirectRequest extends FormRequest
    {
        /**
         * @return bool
         */
        public function authorize(): bool
        {
            return true;
        }

        /**
         * @return array
         */
        public function rules(): array
        {
            return [
                'url_from'    => 'required|url',
                'url_to'      => 'required|url',
                'status_code' => [
                    'required',
                    //Rule::in(array_keys(config('redirect.status_codes'))),
                ],
                'is_active'   => 'boolean',
                'position'    => 'integer|min:1|max:999999',
            ];
        }

        /**
         * @return array
         */
        public function attributes(): array
        {
            return [
                'url_from'    => __('redirect::redirect.url_from'),
                'url_to'      => __('redirect::redirect.url_to'),
                'status_code' => __('redirect::redirect.status_code'),
                'is_active'   => __('redirect::redirect.is_active'),
                'position'    => __('redirect::redirect.position'),
            ];
        }
    }

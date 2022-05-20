<?php

namespace App\Services;

use App\Repositories\SearchRepository;
use Illuminate\Validation\ValidationException;

class MainService
{
    protected SearchRepository $searchRepository;

    public function __construct(SearchRepository $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    /**
     * @throws ValidationException
     */
    public function doSearch($search): array
    {
        if(empty($search)) {
            throw ValidationException::withMessages(["message" => "Введіть слово для пошуку"]);
        }

        return $this->searchRepository->doSearch($search);
    }
}

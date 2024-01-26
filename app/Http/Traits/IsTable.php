<?php
namespace App\Http\Traits;
trait IsTable
{
    public  $search = '';
    public  $paginationCount = 15;
    protected  $paginationTheme = 'bootstrap';
    public  $orderBy = 'Date';
    public  $orderDirection = 'desc';
    public  $columns = ['Date' => 'created_at'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function searchPage()
    {

    }
}

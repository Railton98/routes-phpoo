<?php

namespace app\database;

class Pagination
{
    private int $currentPage = 1;
    private int $totalPages;
    private int $linksPerPage = 1;
    private int $itemsPerPage = 10;
    private int $totalItems;
    private int $pageIdentifier = 'page';

    public function setTotalItems(int $totalItems)
    {
        $this->totalItems = $totalItems;
    }

    public function setPageIdentifier(string $identifier)
    {
        $this->pageIdentifier = $identifier;
    }

    public function setItemsPerPage(int $itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    private function calculations()
    {
        $this->currentPage = $_GET['page'] ?? 1;

        $offset = ($this->currentPage - 1) * $this->itemsPerPage;

        $this->totalPages = ceil($this->totalItems / $this->itemsPerPage);

        return "LIMIT $this->itemsPerPage OFFSET $offset";
    }

    public function dump()
    {
        return $this->calculations();
    }

    public function links()
    {
        $links = "<ul class='pagination'>";

        if ($this->currentPage > 1) {
            $previous = $this->currentPage - 1;
            $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $previous]));
            $first = http_build_query(array_merge($_GET, [$this->pageIdentifier => 1]));

            $links .= "<li class='page-item'><a href='?$linkPage'>Anterior</a></li>";
            $links .= "<li class='page-item'><a href='?$first'>Primeira</a></li>";
        }

        if ($this->currentPage < $this->totalPages) {
            $next = $this->currentPage + 1;
            $linkPage = http_build_query(array_merge($_GET, [$this->pageIdentifier => $next]));
            $last = http_build_query(array_merge($_GET, [$this->pageIdentifier => $this->totalPages]));

            $links .= "<li class='page-item'><a href='?$linkPage'>Próxima</a></li>";
            $links .= "<li class='page-item'><a href='?$last'>Última</a></li>";
        }

        $links .= "</ul>";
    }
}

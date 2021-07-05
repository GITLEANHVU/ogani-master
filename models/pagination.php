<?php
class Pagination
{
    public static function createLinks($baseUrl, $totalRows, $perPage, $page_num)
    {
        // Kiem tra neu khong co du lieu (hoac chi co 1 trang) => khong hien thi thanh phan trang
        if ($totalRows <= 1) {
            return "";
        }

        // Tinh tong so trang
        $totalLinks = ceil($totalRows / $perPage);
        $a = $totalRows % $perPage;
        if ($a < 1) {
            $totalLinks+=1;
        }

        // Ban dau gan tat ca la chuoi rong

        $next = $page_num;
        $pre = $page_num;
        $disableNext = "";
        $disablePre = "";

        if ($next < $totalLinks) {
            $next++;
        }
        if ($pre > 0) {
            $pre--;
        }

        if ($page_num == $totalLinks) {
            $disableNext = 'disabled';
        }

        if ($page_num == 1) {
            $disablePre = 'disabled';
        }

        $s = '';
        for ($i = 1; $i <= $totalLinks; $i++) {
            if($page_num == $i) {
                $s .= "<li class='page-item'><a class='page-link active' href='$baseUrl"."page=$i'>$i</a></li>";
            } else
            $s .= "<li class='page-item'><a class='page-link' href='$baseUrl"."page=$i'>$i</a></li>";
        }

        
        // active
        $output =
            "
        <nav aria-label='Page navigation example'>
            <ul class='pagination'>
            <li class='page-item " . $disablePre . "'><a class='page-link' href='$baseUrl'>First</a></li>
            <li class='page-item " . $disablePre . "'><a class='page-link' href='$baseUrl"."page=$pre'>Previous</a></li>
            $s
            <li class='page-item " . $disableNext . "'><a class='page-link' href='$baseUrl"."page=$next'>Next</a></li>
            <li class='page-item " . $disableNext . "'><a class='page-link' href='$baseUrl"."page=$totalLinks'>Last</a></li> 
            </ul>
        </nav>
        ";

        return $output;
    }
}

<?php

include_once 'Database.php';

class MemberSystem {

    private $objDB;
    private $NUM_ROWS;
    private $PAGE_SIZE;
    
    function __construct() {
        $this->objDB = new Database();
    }

    function newMember($data) {

        $str = "insert into member (Role_id,name,lastname,gender,birthdate,address,phoneNumber,email,password,create_dt,update_dt) "
                . "values(2,'" . $data['name'] . "','" . $data['lname'] . "'," . $data['gender'] . ",'" . $data['birthday'] . "','" . $data['address'] . "','" . $data['phone'] . "','" . $data['email'] . "','". $data['password'] ."','" . date("Y-m-d  H:i:s") . "','" . date("Y-m-d  H:i:s") . "')";

        return $this->objDB->query($str);
    }

    function editMember($data) {
        $str = "update member set name='" . $data['POST']['name'] . "' , lastname='" . $data['POST']['lastname'] . "' ,  gender='" . $data['POST']['gender'] . "',birthdate='" . $data['POST']['birthdate'] . "',address='" . $data['POST']['address'] . "',phoneNumber='" . $data['POST']['phoneNumber'] . "',email='" . $data['POST']['email'] . "',password='". $data['password'] ."' where id = '" . $data['GET']['memberid'] . "'";
        return $this->objDB->query($str);
    }

    function deleteMember($data) {
        echo 'Deleted Member';
    }

    function getMemeberById($id) {
        $str = "select * from member where id='" . $id . "'";
        $rs = $this->objDB->query($str);
        $arrauIterator = new ArrayIterator();
        while ($row = mysql_fetch_object($rs)) {
            $arrauIterator->append($row);
        }
        return $arrauIterator;
    }
    
    function getMemberAllPaging($pageSize, $page) {
        $this->PAGE_SIZE = $pageSize;
        $lim_start = (($page - 1) * $pageSize);
        $lim_end = $pageSize;
        $limit = "limit " . $lim_start . ", " . $lim_end;

        $str = "select m.id, m.role_id, m.name, m.lastname, m.gender, m.birthdate, m.address, m.phoneNumber, 
                m.email, m.password, m.detail, m.create_dt, m.update_dt, r.name as role_name, r.detail as role_detail 
                from member m left join role r on m.role_id=r.id 
                order by m.create_dt desc ";

        $this->NUM_ROWS = mysql_num_rows($this->objDB->query($str));
        $rs = $this->objDB->query($str . $limit);
        $arrayIterator = new ArrayIterator();

        while ($row = mysql_fetch_object($rs)) {
            $arrayIterator->append($row);
        }
        return $arrayIterator;
    }
    
    function getPageing($currentPage) {
        $pages = ceil($this->NUM_ROWS / $this->PAGE_SIZE);
        
        $temp = '<ul class="pagination">';
        $temp .= '<li><a>หน้าที่</a></li>';
        $temp .= '<li><a href="ManageMemberProfile.php?page=' .(($currentPage - 1) < 1 ? 1 : ($currentPage - 1)). '"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
        for ($i = 1; $i <= $pages; $i++) {
            $temp .= '<li><a href="ManageMemberProfile.php?page=' .$i. '">' .$i. '</a></li>';
        }
        $temp .= '<li><a href="ManageMemberProfile.php?page=' .(($currentPage + 1) > $pages ? $currentPage : ($currentPage + 1)). '"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';
        $temp .= '</ul>';
        
        echo $temp;
    }
}

<?php
function isAuthenticated()
{
	$ci =& get_instance();
	return $ci->session->is_logged_in === TRUE;
}

function assets($pathFile)
{
	return base_url('assets/' . $pathFile);
}

function getData($tableName, $columns = '*', $where = [])
{
	$ci =& get_instance();
	$sql = "SELECT $columns FROM $tableName";

	if (count($where) !== 0) {
		$key = array_keys($where)[0];
		$val = array_values($where)[0];
		$sql .= " WHERE $key = '$val'";
	}

	return $ci->db->query($sql)->result();
}

/*
 * $type => success OR error
 * $actionType => insert, update, delete
 * $dataType => type of data
 *
 * Example message:
 * success => Data XYZ berhasil di.... [SIMPAN, PERBARUI, HAPUS]
 * error   => Data XYZ gagal di.... [SIMPAN, PERBARUI, HAPUS]
 * */
function setArrayMessage($type, $actionType, $dataType)
{
	$messageText = "";
	$messageType = "";
	$messageStatus = ($type == 'success') ? " berhasil " : " gagal ";

	if ($actionType === 'insert') {
		$messageType = " disimpan!";
	} else if ($actionType === 'update') {
		$messageType = " diperbarui!";
	} else if ($actionType === 'delete') {
		$messageType = " dihapus!";
	}
	$messageText = "Data " . $dataType . $messageStatus . $messageType;

	return [
		'type' => $type,
		'text' => $messageText,
	];
}

function getStatus($status, $type = 'status')
{
	$badge = "";
	if ($type == 'status') {
		if ($status == 1) {
			$badge = "<label class='badge badge-success'>AKTIF</label>";
		} else {
			$badge = "<label class='badge badge-danger'>NON-AKTIF</label>";
		}
	} elseif ($type == 'level') {
		if ($status == "ADMIN") {
			$badge = "<label class='badge badge-info'>ADMIN</label>";
		} else {
			$badge = "<label class='badge badge-warning'>CSO</label>";
		}
	}
	return $badge;
}

function getUser($index = null)
{
	if (isset($_SESSION['user'])) {
		$userSession = $_SESSION['user'];

		$userData = getData('pengguna', '*', [
			'id_pengguna' => $userSession->id_pengguna
		]);
		$user = $userData[0];

		if ($userSession->nama_lengkap !== $user->nama_lengkap || $userSession->username !== $user->username) {
			//Change session value
			$_SESSION['user'] = $user;
		}
		return $_SESSION['user']->$index;
	} else {
		return null;
	}
}

function showPageHeader($title = '')
{
	$ci =& get_instance();
	$firstSegment = $ci->uri->segment(1);
	$firstUri = ($title !== '') ? $title : $firstSegment;

	if($firstUri != 'dashboard' && $title == '') {
		$firstUri = "Data " . $firstUri;
	}

	$pageTitle = ucwords(strtolower(str_replace("-", " ", $firstUri)));

	return "<div class='row page-title-header mb-0'>
				<div class='col-12'>
					<div class='page-header'>
						<h4 class='page-title'>" . $pageTitle . "</h4>
					</div>
				</div>
			</div>";
}

function showUserLevel($index = NULL)
{
	$userLevel = [
		'ADMINISTRATOR' => 'ADMINISTRATOR',
		'OPERATOR' => 'OPERATOR'
	];

	return ($index !== null) ? $userLevel[$index] : $userLevel;
}

function uriSegment($index) {
	$ci =& get_instance();
	return  $ci->uri->segment($index);
}

function generateID($tableName, $columnName, $codeName) {
    $ci =& get_instance();

    $queryString = "SELECT * FROM $tableName ORDER BY $columnName DESC LIMIT 1";
    $query = $ci->db->query($queryString);
    $uniqueId = "";

    if($query->num_rows() > 0) {
    	$rowData = $query->row();
    	$lastId = $rowData->{$columnName};
    	$lastOrder = str_replace($codeName . "-", "", $lastId);
    	if ($lastOrder != '') {
            $lastOrder = (int)$lastOrder + 1;

            $addZero = "";
            if (strlen($lastOrder) == 1) {
                $addZero = "000";
            } elseif (strlen($lastOrder) == 2) {
                $addZero = "00";
            } elseif (strlen($lastOrder) == 3) {
                $addZero = "0";
            }

            $uniqueId = $codeName . "-" . $addZero . $lastOrder;
        } else {
            $uniqueId = $codeName . "-0001";
        }

	} else {
    	$uniqueId = $codeName . "-0001";
	}

    return $uniqueId;
}

function dd($data) {
    echo json_encode($data);
    die();
}

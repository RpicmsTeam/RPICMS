<h2>User-Pages</h2>
<?php
require_once($root."/core/backend/admin/modules/modul_normal-login/models/config.php");
$pages = getPageFiles(); //Retrieve list of pages in root usercake folder
$dbpages = fetchAllPages(); //Retrieve list of pages in pages table
$creations = array();
$deletions = array();

//Check if any pages exist which are not in DB
foreach ($pages as $page){
	if(!isset($dbpages[$page])){
		$creations[] = $page;
	}
}

//Enter new pages in DB if found
if (count($creations) > 0) {
	createPages($creations)	;
}

if (count($dbpages) > 0){
	//Check if DB contains pages that don't exist
	foreach ($dbpages as $page){
		if(!isset($pages[$page['page']])){
			$deletions[] = $page['id'];
		}
	}
}

//Delete pages from DB if not found
if (count($deletions) > 0) {
	deletePages($deletions);
}

//Update DB pages
$dbpages = fetchAllPages();
?>
<table class="table table-striped">
<tr><th>Id</th><th>Page</th><th>Access</th></tr>
<?php
//Display list of pages
foreach ($dbpages as $page){
	echo "
	<tr>
	<td>
	".$page['id']."
	</td>
	<td>
	<a href='admin.php?page_id=".$page['id']."#usercenter'>".$page['page']."</a>
	</td>
	<td>";

	//Show public/private setting of page
	if($page['private'] == 0){
		echo "Public";
	}
	else {
		echo "Private";
	}

	echo "
	</td>
	</tr>";
}
?>
</table>

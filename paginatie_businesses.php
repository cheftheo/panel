<?php
$item_per_page = 15;
if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	
	include("config.php"); 
	if(isset($_POST["page"])){
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		if(!is_numeric($page_number)){die('Invalid page number!');}
	}else{
		$page_number = 1;
	}
	$results = $db->query("SELECT COUNT(*) FROM bizz");
	$get_total_rows = $results->fetch_row();
	$total_pages = ceil($get_total_rows[0]/$item_per_page);
	$page_position = (($page_number-1) * $item_per_page);
	
?>
				<div class="card">
					<div class="card-body">
						<h4>Businesses</h4>
						<table class="table color-table dark-table">
							<thead>
								<tr>
									<th>#</th>
									<th>Username</th>
									<th>Price</th>
									<th>Level</th>
									<th>Name</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$sql = "SELECT * from bizz ORDER BY ID ASC LIMIT $page_position, $item_per_page";
								$result = $db->query($sql);

								if ($result->num_rows > 0) {
									
									while($row = $result->fetch_assoc()) {
										?>
											<tr>
												<td><?=$row["ID"];?></td>
												<?php if($row["Owner"] == 0) { ?>
												<td>The State</td>
												<?php }else{ ?>
												<td><a href="<?=$serverURL;?>user/<?=$row["Owner"];?>"><?=$row["Owner"];?></a></td>
												<?php } ?>
												<?php if($row["Owner"] == 0) { ?>
												<td><span class="text-danger"><?=calculeazabani($row["BuyPrice"])?>$</span></td>
												<?php }else{ ?>
												<td><span class="text-danger">not for sale</span></td>
												<?php } ?>
												<td><?=$row["LevelNeeded"];?></td>
												<td><?=$row["Message"];?></td>
												<td>
												<button type="button" class="btn btn-info btn-circle vehicle" onclick="showMap(<?php echo $row["EntranceX"] ?>, <?php echo $row["EntranceY"] ?>);"><i class="fa fa-map-marker"></i> </button>

												</td>
											</tr>
										<?php
									}
								}
							?>
                </tbody>
            </table>
					<?php
						echo '<div align="center">';
						echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
						echo '</div>';
						exit;
					?>	
                    </div>
<?php
}
function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){
        $pagination .= '<ul class="pagination">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 3;
        $next           = $current_page + 1;
        $first_link     = true;
        
        if($current_page > 1){
			$previous_link = ($previous==0)? 1: $previous;
            $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="1">«</a></li>';
                for($i = ($current_page-2); $i < $current_page; $i++){
                    if($i > 0){
                        $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="'.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false;
        }
        
        if($first_link){
            $pagination .= '<li class="page-item active"><span class="page-link">'.$current_page.'</span></li>';
        }else{
            $pagination .= '<li class="page-item active"><span class="page-link">'.$current_page.'</span></li>';
        }
                
        for($i = $current_page+1; $i < $right_links ; $i++){
            if($i<=$total_pages){
                $pagination .= '<li class="page-item"><a class="page-link" href="#" data-page="'.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
				$next_link = ($i > $total_pages) ? $total_pages : $i;
				$pagination .= '<li class="page-item"><a class="page-link" <a href="#" data-page="'.$total_pages.'">»</a></li>';
        }
        
        $pagination .= '</ul>'; 
    }
    return $pagination;
}

?>


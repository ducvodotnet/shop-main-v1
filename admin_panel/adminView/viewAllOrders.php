<div id="ordersBtn" >
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Products</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Order Status</th>
     </tr>
    </thead>
     <?php
      include_once "../config/dbconnect.php";
      $sql="Select  order_items.order_id AS 'ID', users.email AS 'email', products.name AS 'productsname', order_items.quantity AS 'quantity', order_items.price*order_items.quantity AS 'price', orders.status AS 'status' from order_items
      inner join products on order_items.product_id = products.id
      inner join orders on order_items.order_id = orders.id
      inner join users on orders.user_id = users.id
      ;";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["ID"]?></td>
          <td><?=$row["email"]?></td>
          <td><?=$row["productsname"]?></td>
          <td><?=$row["quantity"]?></td>
          <td>$<?=$row["price"]?></td>
           <?php 
                if($row["status"]=='pending'){
                            
            ?>
                <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['ID']?>')">Pending </button></td>
            <?php
                        
                }else{
            ?>
                <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['ID']?>')">Delivered</button></td>
        
            <?php
            }
            ?>
              
        </tr>
    <?php
            
        }
      }
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>
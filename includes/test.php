<?php 
                         
                         include "connection.php";
                         $query ="SELECT * FROM library.books";
                         $Statement=$connection->prepare($query);
                         $Statement->execute();
                         $row=$Statement->fetchAll(PDO::FETCH_ASSOC);
                         $count=1;
                         foreach ($row as $display){
                             $book_id = $display['book_id'];
                             $book_name = $display['book_name'];
                             $book_author = $display['book_author'];
                             $book_isbn = $display['book_isbn'];
                             $book_price = $display['book_price'];
                             $book_category = $display['cat_name'];
                                ?>
                                <tr>
                                <td><?php echo $book_id ?></td>
                                <td><?php echo $book_name ?></td>
                                <td><?php echo $book_category ?></td>
                                <td><?php echo $book_author ?></td>
                                <td><?php echo $book_isbn ?></td>
                                <td><?php echo $book_price ?></td>
                                <td>
                                  <a  href="edit-book.php?book_id=<?php echo $book_id;?>" class="btn btn-success"  ><span class="fa fa-pen"></span></a>
                                
                                <a  href="book-delete.php?book_id=<?php echo $book_id;?>" class="btn btn-danger" ><span class="fa fa-trash"></span></a>
                                </td>
                               
                                
                                </tr>
                       <?php  
                       
                    }
                       ?>
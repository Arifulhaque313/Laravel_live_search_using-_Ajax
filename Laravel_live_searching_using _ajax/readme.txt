How to apply (make sure  that  you're connect  the  jquery  CDN)

1.After  successfully  intall  laravel and connect  with  database.
2.You have  to  show  the  all  data  in  a  page.
3.Now  where  you  show  the  all  data  there  you  set  a  input  field  with  id  search.	
jquery ajax code are

  <script>

        $(document).ready(function(){
           
            $('#search').on('keyup',function(){

                var query =  $(this).val();
                if(query){
                    $('.all-data').hide();
                    $('.search-data').show();
                }
                else{
                    $('.all-data').show();
                    $('.search-data').hide();
                }


                $.ajax({
                    url:"search",
                    type:"GET",
                    data:{'search':query},
                    
                    success:function(data){
                        $('#search_list').html(data);
                    }

                });
            });

        });
		
  </script>   

4. In  the  controller  you  have  to  write  
	public function search(Request  $request){

        if($request->ajax()){
            $data = User::where('id','like','%'.$request->search.'%')
            ->orwhere('first_name','like','%'.$request->search.'%')
            ->orwhere('role','like','%'.$request->search.'%')
            ->orwhere('email','like','%'.$request->search.'%')->get();

                $output ='';

                if(count($data)>0){

                    $output ='
                    <table class="table">
                   
                    <tbody>';

                        foreach($data as $row){

                            //running code  
                            $output .='
                            <tr>
                            <td>'.$row->id.'</td>
                            <td>'.$row->first_name.'  '.$row->last_name.'</td>
                            <td>'.$row->email.'</td>
                            <td>'.$row->role.'</td>
                            </tr>
                            ';
                        }



                $output .= '
                    </tbody>
                    </table>';
                }
                else{
                    $output.='No result';
                }
                return $output;
             }
            }
	

NOTE:: All  the  codes  are  attach  with this  repository.
	
'<div class="form-group" id="itemdiv_'+counter+'" style="margin-top: 5px;">'+
              '<label for="title">'+
                'Item '+counter+'<span class="text-danger">&#042;</span>'+
                '<a onclick="removeDiv('+counter+')" class="deleteRow" href="javascript: void(0);"><i class="fas fa-trash-alt"></i></a>'+
              '</label>'+

              '<div class="form-group">'+
                '<select required="" class="form-control valid" name="user_id">'+
                  '<option value="8">Dey (rahul.kumar@accenza.com)</option><option value="9">Rezual (karim@techpourri.com)</option><option value="40">Mahadev Maity (mahadev@accenza.com)</option><option value="41">Sanjay Karmakar (sanjay@techpourri.com)</option><option value="42">Dean Elgar (rufoki@travala10.com)</option><option value="43">Mahadev Maity (mdevs@gmail.com)</option><option value="70">Kadut (kadut@mailhex.com)</option><option value="71">Debby Brown (debby@accenza.com)</option><option value="72">Niladri (niladri1@accenza.co)</option><option value="73">Sanjay (sanjay@techpourri.co)</option><option value="74">niladri (niladri.dis@gmail.com)</option><option value="75">Niladri (niladri.sur123@yahoo.co.in)</option><option value="76">Niladri (niladri.sur@rediffmail.com)</option><option value="77">Niladri Sur (niladri@accenza.co)</option>'+
                '</select>'+
              '</div>'+


              '</label>'+
            '</div>'


{!! Form::select('city_id', $cities_respectto_state, 'null', ['id' => 'city_id', 'class' => 'form-control', 'placeholder' => 'Select']) !!}
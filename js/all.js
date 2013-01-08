var readUrl   = 'index.php/home/read',
    updateUrl = 'index.php/home/update',
    delUrl    = 'index.php/home/delete',
    delHref,
    updateHref,
    updateemp_no;


$( function() {
    
    $( '#tabs' ).tabs({
        fx: { height: 'toggle', opacity: 'toggle' }
    });
    
    reademployees();
    
    $( '#msgDialog' ).dialog({
        autoOpen: false,
        
        buttons: {
            'Ok': function() {
                $( this ).dialog( 'close' );
            }
        }
    });
    
    $( '#updateDialog' ).dialog({
        autoOpen: false,
        buttons: {
            'Update': function() {
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                $( this ).dialog( 'close' );
                
                $.ajax({
                    url: 'updateUrl',
                    type: 'POST',
                    data: $( '#updateDialog form' ).serialize(),
                    
                    success: function( response ) {
                        
                        $( '#msgDialog > p' ).html( response );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                        //--- update row in table with new values ---
                       
                        var birth_date = $( 'tr#' + updateId + ' td' )[ 1 ];
						var first_name = $( 'tr#' + updateId + ' td' )[ 2 ];
                        var last_name = $( 'tr#' + updateId + ' td' )[ 3 ];
						var gender = $( 'tr#' + updateId + ' td' )[ 4 ];
                        var hire_date = $( 'tr#' + updateId + ' td' )[ 5 ];
                        
                        
                        $( birth_date ).html( $( '#birth_date' ).val() );
						$( first_name ).html( $( '#first_name' ).val() );
                        $( last_name ).html( $( '#last_name' ).val() );
						$( gender ).html( $( '#gender' ).val() );
                        $( hire_date ).html( $( '#hire_date' ).val() );
						
                        //--- clear form ---
                        $( '#updateDialog form input' ).val( '' );
                        
                    } //end success
                    
                }); //end ajax()
            },
            
            'Cancel': function() {
                $( this ).dialog( 'close' );
            }
        },
        width: '350px'
    }); //end update dialog
    
    $( '#delConfDialog' ).dialog({
        autoOpen: false,
        
        buttons: {
            'No': function() {
                $( this ).dialog( 'close' );
            },
            
            'Yes': function() {
                //display ajax loader animation here...
                $( '#ajaxLoadAni' ).fadeIn( 'slow' );
                
                $( this ).dialog( 'close' );
                
                $.ajax({
                    url: delHref,
                    
                    success: function( response ) {
                        //hide ajax loader animation here...
                        $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                        
                        $( '#msgDialog > p' ).html( response );
                        $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                        
                        $( 'a[href=' + delHref + ']' ).parents( 'tr' )
                        .fadeOut( 'slow', function() {
                            $( this ).remove();
                        });
                        
                    } //end success
                });
                
            } //end Yes
            
        } //end buttons
        
    }); //end dialog
    
    $( '#records' ).delegate( 'a.updateBtn', 'click', function() {
        updateHref = $( this ).attr( 'href' );
        updateId = $( this ).parents( 'tr' ).attr( "Id" );
        
        $( '#ajaxLoadAni' ).fadeIn( 'slow' );
        
        $.ajax({
            url: 'index.php/home/getById/' + updateId,
            dataType: 'json',
            
            success: function( response ) {
               
                $( '#birth_date' ).val( response.birth_date );
				$( '#first_name' ).val( response.first_name );
                $( '#last_name' ).val( response.last_name );
				$( '#gender' ).val( response.gender );
                $( '#hire_date' ).val( response.hire_date );
                
                $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                
                //--- assign id to hidden field ---
                $( '#userId' ).val( updateId );
                
                $( '#updateDialog' ).dialog( 'open' );
            }
        });
        
        return false;
    }); //end update delegate
    
    $( '#records' ).delegate( 'a.deleteBtn', 'click', function() {
        delHref = $( this ).attr( 'href' );
        
        $( '#delConfDialog' ).dialog( 'open' );
        
        return false;
    
    }); //end delete delegate
    
    
    // --- Create Record with Validation ---
    $( '#create form' ).validate({
        rules: {
            cemp_no: { required: true },
			cbirth_date: { required: true },
			cfirst_name: { required: true },
			clast_name: { required: true },
			cgender: { required: true },
			chire_date: { required: true }
            
        }, 
		
        messages: {
            
            cemp_no: { required: "Emp No is required." },
			cbirth_date: { required: "Birth Date is required." },
			cfirst_name: { required: "First Name is required." },
			clast_name: { required: "Last Name is required." },
			cgender: { required: "Gender is required." },
			chire_date: { required: "Hire Date is required." }
        },
        
        
        submitHandler: function( form ) {
           
            
            $.ajax({
                url: 'index.php/home/create',
                type: 'POST',
                data: $( form ).serialize(),
                
                success: function( response ) {
                    $( '#msgDialog > p' ).html( 'New user created successfully!' );
                    $( '#msgDialog' ).dialog( 'option', 'title', 'Success' ).dialog( 'open' );
                    
                    //clear all input fields in create form
                    $( 'input', this ).val( '' );
                    
                    //refresh list of users by reading it
                    //readUsers
                    dataTable.fnAddData([
                        response,
                       
                        $( '#cbirth_date' ).val(),
						 $( '#cfirst_name' ).val(),
                        $( '#clast_name' ).val(),
						 $( '#cgender' ).val(),
                        $( '#chire_date' ).val(),
                        '<a class="updateBtn" href="' + updateUrl + '/' + response + '">Update</a> | <a class="deleteBtn" href="' + delUrl + '/' + response + '">Delete</a>'
                    ]);
                    
                    //open Read tab
                    $( '#tabs' ).tabs( 'select', 0 );
                    
                    $( '#ajaxLoadAni' ).fadeOut( 'slow' );
                }
				 
            });
            
            return false;
        }
    });
    
}); //end document ready


function reademployees() {
    //display ajax loader animation
    $( '#ajaxLoadAni' ).fadeIn( 'slow' );
    
    $.ajax({
        url: readUrl,
        dataType: 'json',
        success: function( response ) {
            
            for( var i in response ) {
                response[ i ].updateLink = updateUrl + '/' + response[ i ].emp_no;
                response[ i ].deleteLink = delUrl + '/' + response[ i ].emp_no;
				
            }
            
            //clear old rows
            $( '#records > tbody' ).html( '' );
            
            //append new rows
           $( '#records' ).render( response ).appendTo( "#records > tbody" );
            
            //apply dataTable to #records table and save its object in dataTable variable
           if( typeof dataTable == 'undefined' )
                dataTable = $( "#records " ).dataTable({"bJQueryUI": true});
            
            //hide ajax loader animation here...
            $( '#ajaxLoadAni' ).fadeOut( 'slow' );
        }
    });
} // end readUsers
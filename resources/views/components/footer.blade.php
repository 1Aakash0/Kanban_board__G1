	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(".comment").on('click',function(){
			$(this).next().toggleClass('d-none');
		})

		$(".cancel").on('click',function() {
			$(this).parent().toggleClass('d-none');
		})

		$(".move-req").on('change',function() {
			var task_id = $(this).parents(".task").attr('id');
			var status = $(this).val();
			$.ajax({
      			type : "post",
                url  : "{{route('send_req')}}",
                data :  {task_id:task_id,status,status},
                headers: {
		          	'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for Laravel
		        },
                success : function(res){
                	$(this).parent().toggleClass('d-none');
                	if(res.success == true) {
                		Swal.fire({
	                		title: res.message,
	                		icon: "success" ,
	                	}).then(() => {
	                		location.reload()	
	                	})
                	} else {
                		Swal.fire({
	                		title: res.message,
	                		icon: "warning" ,
	                	}).then(() => {
	                		location.reload()	
	                	})
                	}
                }
            });
		})

		$(".save").on('click',function() {
			var desc = $(this).prev().val();
			var ids = $(this).data('id');
			if(desc == null || desc == ""){
				alert("Please Enter the comment");
			} else {
				$.ajax({
	      			type : "post",
	                url  : "{{route('add_comment')}}",
	                data :  {desc:desc,ids,ids},
	                headers: {
			          	'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for Laravel
			        },
	                success : function(res){
	                	$(this).parent().toggleClass('d-none');
	                	if(res.success == true) {
	                		Swal.fire({
		                		title: res.message,
		                		icon: "success" ,
		                	}).then(() => {
		                		location.reload()	
		                	})
	                	} else {
	                		Swal.fire({
		                		title: res.message,
		                		icon: "warning" ,
		                	}).then(() => {
		                		location.reload()	
		                	})
	                	}
	                }
	            });
			}
		})

	    function allowDrop(ev) {
		    ev.preventDefault();
		}

		function drag(ev) {
			console.log(ev.target.id);
		    ev.dataTransfer.setData("text", ev.target.id);
		}

	 	function drop(ev, status) {
		  	ev.preventDefault();
		  	var data = ev.dataTransfer.getData("text");
		  	var target = ev.target;

		  	if (target.classList.contains('column')) {
			    var draggedElement = document.getElementById(data);
			    if (draggedElement) {
			    	 target.appendChild(draggedElement);
			    } else {
			      	console.error("Dragged element not found");
			    }
		  	} else {
		   		console.error("Invalid drop target");
		  	}
		  	updateTaskStatus(data, status);
		}

		function updateTaskStatus(taskId, status) {
			$.ajax({
      			type : "post",
                url  : "{{route('update_task')}}",
                data :  {status:status,taskId,taskId},
                headers: {
		          	'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for Laravel
		        },
                success : function(res){
                	if(res.success == true) {
                	} else {
                		Swal.fire({
	                		title: res.message,
	                		icon: "warning" ,
	                	}).then(() => {
	                		location.reload()	
	                	})
                	}
                }
            });
	    }

		$("#add_role").on("click",function(){
		    Swal.fire({
		      	title: 'Enter Role Name',
		      	input: 'text',
		      	showCancelButton: true,
		      	confirmButtonText: 'Submit',
		      	showLoaderOnConfirm: true,
		      	preConfirm: (value) => {
			        if (!value) {
			          Swal.showValidationMessage('Please enter Role Name');
			        }
			        return value;
			    }
		    }).then((result) => {
		      	if (result.isConfirmed) {
		      		$.ajax({
		      			type : "post",
		                url  : "{{route('add_role')}}",
		                data : {role:result.value},
		                headers: {
				          	'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for Laravel
				        },
		                success : function(res){
		                	if(res.success == true) {
			                	Swal.fire({
			                		title: res.message,
			                		icon: "success" ,
			                	}).then(() => {
			                		location.reload();
			                		
			                	})
		                	} else {
		                		Swal.fire({
			                		title: res.message,
			                		icon: "warning" ,
			                	}).then(() => {
			                		location.reload()	
			                	})
		                	}
		                }
		      		})
		    	}
		    });
		})

		$(".elipsis").on('click',function(){
			$(this).next().toggleClass('d-none');
		})

		$(".delete").on("click",function(){
			var id = $(this).data('id');
			swal.fire({
				title: "Are you sure?",
				text: "You won't to delete this User?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel!",
			}).then((result) => {
			  	if (result.isConfirmed) {
			  		$.ajax({
		      			type : "post",
		                url  : "{{route('delete_user')}}",
		                data :  {id:id},
		                headers: {
				          	'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for Laravel
				        },
		                success : function(res){
		                	if(res.success == true) {
		                		Swal.fire({
			                		title: res.message,
			                		icon: "success" ,
			                	}).then(() => {
			                		location.reload()	
			                	})
		                	} else {
		                		Swal.fire({
			                		title: res.message,
			                		icon: "warning" ,
			                	}).then(() => {
			                		location.reload()	
			                	})
		                	}
		                }
		            });
			  	} 
			});
		});

		$(".delete_req").on("click",function(){
			var id = $(this).data('id');
			swal.fire({
				title: "Are you sure?",
				text: "You won't to delete this User?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel!",
			}).then((result) => {
			  	if (result.isConfirmed) {
			  		$.ajax({
		      			type : "post",
		                url  : "{{route('delete_req')}}",
		                data :  {id:id},
		                headers: {
				          	'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for Laravel
				        },
		                success : function(res){
		                	if(res.success == true) {
		                		Swal.fire({
			                		title: res.message,
			                		icon: "success" ,
			                	}).then(() => {
			                		location.reload()	
			                	})
		                	} else {
		                		Swal.fire({
			                		title: res.message,
			                		icon: "warning" ,
			                	}).then(() => {
			                		location.reload()	
			                	})
		                	}
		                }
		            });
			  	} 
			});
		});

		$(".delete_task").on("click",function(){
			$(this).parent().toggleClass('d-none');
			var id = $(this).data('id');
			swal.fire({
				title: "Are you sure?",
				text: "You won't to delete this Task?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel!",
			}).then((result) => {
			  	if (result.isConfirmed) {
			  		$.ajax({
		      			type : "post",
		                url  : "{{route('delete_task')}}",
		                data :  {id:id},
		                headers: {
				          	'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for Laravel
				        },
		                success : function(res){
		                	if(res.success == true) {
		                		Swal.fire({
			                		title: res.message,
			                		icon: "success" ,
			                	}).then(() => {
			                		location.reload()	
			                	})
		                	} else {
		                		Swal.fire({
			                		title: res.message,
			                		icon: "warning" ,
			                	}).then(() => {
			                		location.reload()	
			                	})
		                	}
		                }
		            });
			  	} 
			});
		});

		$(".accept_req").on("click",function(){
			var id = $(this).data('id');
			swal.fire({
				title: "Are you sure?",
				text: "You won't to approve this Request?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Yes, approve it!",
				cancelButtonText: "No, cancel!",
			}).then((result) => {
			  	if (result.isConfirmed) {
			  		$.ajax({
		      			type : "post",
		                url  : "{{route('accept_req')}}",
		                data :  {id:id},
		                headers: {
				          	'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for Laravel
				        },
		                success : function(res){
		                	if(res.success == true) {
		                		Swal.fire({
			                		title: res.message,
			                		icon: "success" ,
			                	}).then(() => {
			                		location.reload()	
			                	})
		                	} else {
		                		Swal.fire({
			                		title: res.message,
			                		icon: "warning" ,
			                	}).then(() => {
			                		location.reload()	
			                	})
		                	}
		                }
		            });
			  	} 
			});
		})
	</script>
	@if(Session::has('success'))
		<script type="text/javascript">
			Swal.fire({
	    		title: '{{Session::get("success")}}',
	    		icon: "success" ,
	    	})
		</script>
	@elseif(Session::has('error'))
		<script type="text/javascript">
			Swal.fire({
	    		title: '{{Session::get("error")}}',
	    		icon: "warning" ,
	    	})
		</script>
	@endif
</div>
</div>
</body>
</html>
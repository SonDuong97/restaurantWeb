<template>
	<div id="page-wrapper">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">User
	                    <small>List</small>
	                </h1>
	            </div>
	            <!-- /.col-lg-12 -->
	            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                <thead>
	                    <tr align="center">
	                        <th>ID</th>
	                        <th>Username</th>
	                        <th>Email</th>
	                        <th>Edit</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    <tr class="even gradeC" align="center" v-for="user in users">
	                        <td>{{user.id}}</td>
	                        <td>{{user.name}}</td>
	                        <td>{{user.email}}</td>
	                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <router-link :to="{name: 'editUser', params: {'id': user.id}}">Edit</router-link></td>
	                    </tr>
	                </tbody>
	            </table>
	        </div>
	        <!-- /.row -->
	    </div>
	    <!-- /.container-fluid -->
	</div>
</template>

<script type="text/javascript">
	export default {
		data: () => {
			return {
				users: []
			}
		},
		created() {
			this.getUserList()
		},
		methods: {
			getUserList() {
				axios.get('admin/user/showList').then(response => {
					this.users = response.data
				}).catch(errors => {
					console.log(errors)
				})
			}
		}
	}
</script>
<style>
	.avatar-client {
		border-radius: 50%;
		height: 37px;
		width: 37px;
	}

	.client {
		color: #9b9b9b;
	}

	.btn-client {
		margin-right: 5px;
	}
</style>	
<template>
	<div class="container">
		<div class="row"  v-for="post in posts.data" :key="post.id">
			<div class="col-md-1">
				<img :src="'images/profile/' + post.user.avatar" class="avatar-client">
			</div>
			<div class="col-md-11">
				<p>
					<a href="#">{{ post.user.name }}</a>
					{{ post.created_at | agoDate }}
					<br>
					<router-link :to="'/p/' + post.slug">{{ post.title }}</router-link>
				</p>
				<!-- <router-link :to="{ name: 'user', params: { userId: 123 }}">{{ post.title }}</router-link> -->
				<button v-for="tag in post.tags" type="button" class="btn btn-primary btn-client" :key="tag.id">
					{{ tag.name }}
				</button>
				<p>
					<i class="fas fa-eye client"></i>&nbsp;{{ post.view }} &nbsp;&nbsp;&nbsp;
					<i class="fa fa-comments client"></i>&nbsp;{{ post.comments.length }}
				</p>
				<hr>
			</div>
		</div>
		<div>
            <pagination  :data="posts" @pagination-change-page="getResults"></pagination>
        </div>
    </div>
</template>

<script>

	export default {
		data() {
			return {
				posts: {},
			}
		},

		methods: {
			getResults(page = 1) {
                axios.get('' + '/api/c/newestposts?page=' + page)
                    .then(response => {
                        this.posts = response.data;
                });
            },

			getPosts() {
				axios.get('' + '/api/c/newestposts')
				.then(({data}) => this.posts = data)
			}
		},

		created() {
			this.getPosts();
		}

	}
</script>
<template>
    <div class="flex flex-col items-center py-4">
        <NewPost></NewPost>
        <p v-if="loading">loading post...</p>
        <Post v-else v-for="post in posts.data" :key="post.data.post_id" :post="post"></Post>

    </div>
</template>

<script>
    import NewPost from '../components/NewPost';
    import Post from '../components/Post';

    export default {
        name: "NewsFeed",
        components: {
            NewPost,
            Post
        },
        data: () => {
            return {
                // posts: null,
                posts: [],
                loading: true,
            }
        },
        mounted() {
            axios.get('/api/posts')
                .then(res => {
                    this.posts = res.data;
                    this.loading = false;
                })
                .catch(error => {
                    console.log('fail to get post');
                    this.loading = false;
                });
        }
    }
</script>

<style scoped>

</style>

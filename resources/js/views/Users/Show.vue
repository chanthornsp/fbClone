<template>
    <div>
        <div class="w-100 h-64 overflow-x-hidden">
            <img class="object-cover w-full" src="/images/land.jpg" alt="cover">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Show",
        data:() =>{
            return {
                user:null,
                loading:true,
            }
        },
        mounted(){
            axios.get('/api/users/'+ this.$route.params.userId)
                .then(res=>{
                    this.user = res.data;
                })
            .catch(error => {
               console.log(error);
            }).finally(()=>{
                this.loading = false;
            });
            axios.get('/api/posts/'+this.$route.params.userId)
                .then(res => {
                    this.posts = res.data;
                    this.loading = false;
                })
                .catch(error => {
                    console.log(error);
                    this.loading = false;
                });
        }
    }
</script>

<style scoped>

</style>

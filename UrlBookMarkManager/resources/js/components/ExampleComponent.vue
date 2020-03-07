<template>
    <div>
        <button class="btn btn-outline-danger btn-sm" @click="deleteLink">Delete</button>
    </div>
</template>

<script>
    export default {
        props:['userid'],
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {

            }
        },
        methods: {
            deleteLink(){
                console.log('Delete Link : '+this.userid)
                axios.delete('/bookmark/'+this.userid)
                    .then(response=> {
                        // alert(response.data);
                        window.location.reload();
                    })
                    .catch(erros=>{
                        alert(erros)
                    })
            }
        }




    }
</script>

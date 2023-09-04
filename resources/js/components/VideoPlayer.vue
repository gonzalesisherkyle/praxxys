<template>
    <video
        id="my-video"
        class="video-js"
        controls
        preload="auto"
        width="1050"
        height="600"
        poster=""
        data-setup="{}"
    >
        <source src="" type="video/mp4" />
        <!-- <source src="MY_VIDEO.webm" type="video/webm" /> -->
    </video>
</template>
    
    
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
   
<style>

</style>
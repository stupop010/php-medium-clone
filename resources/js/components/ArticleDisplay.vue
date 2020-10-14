<template>
    <div v-html="compiledMarkdown">
    </div>
</template>

<script>
    import DOMPurify from 'dompurify';
    import marked from 'marked';

    export default {
        props: ['article'],
        computed: {
            compiledMarkdown: function() {
                let clean = DOMPurify.sanitize(this.article);
                return marked(clean);   
            }    
        }
    };
</script>
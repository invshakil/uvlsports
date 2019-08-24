<template>
    <div class="">
        <div v-for="(tweet, index) in results" class="post">

            <div class="entry-header">
                <div class="entry-thumbnail">
                    <img v-if="tweet.image" :src="tweet.image" class="img-responsive img-thumbnail"
                         style="margin: 0 auto; display: block" :alt="tweet.title">
                    <img v-else :src="baseUrl + '/' + 'image_upload/system_logo.png'"
                         class="img-responsive img-thumbnail logo-class" alt="tweet.title">
                </div>
            </div>

            <div class="post-content">

                <h2 class="entry-title">
                    <a href="#">{{ tweet.title }}</a>
                </h2>
                <div class="entry-meta">
                    <ul class="list-inline">
                        <li class="publish-date">
                            <a href="#">
                                <i class="fa fa-clock-o"></i> {{ tweet.created_at }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="entry-content">
                    <p align="justify">
                        {{ tweet.description }}
                    </p>
                </div>
            </div>
        </div>
        <infinite-loading :identifier="infiniteId" @infinite="infiniteHandler"></infinite-loading>
    </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading';

    export default {
        name: 'tweet-view',
        components: {
            InfiniteLoading,
        },
        props: {
            tweets: {
                required: false
            }
        },
        mounted() {
            this.results = this.tweets
        },
        data: function () {
            return {
                baseUrl: baseUrl,
                page: 1,
                set: 10,
                results: [],
                next_page_exists: 1,
                infiniteId: +new Date(),
            }
        },
        methods: {
            infiniteHandler($state) {
                let url = this.baseUrl + '/api/get-more-tweets'
                axios.get(url, {
                    params: {
                        set: this.set,
                        page: this.page,
                    },
                }).then(({data}) => {
                    if (data.length) {
                        this.page += 1;
                        this.results.push(...data);
                        $state.loaded();
                    } else {
                        $state.complete();
                    }
                });
            },
            changeType() {
                this.page = 1;
                this.results = [];
                this.infiniteId += 1;
            },
        }
    }
</script>

<style scoped>
    .listing-news .post {
        max-height: 300px;
        margin-top: 0;
    }

    img.logo-class {
        margin: 0 auto;
        display: block;
        padding: 45px;
        background: #00000013;
    }

</style>
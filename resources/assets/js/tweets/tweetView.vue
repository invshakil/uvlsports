<template>
    <div class="">
        <h1 class="section-title">
            {{ title }}

            <button @click="showModal('create')" class="btn btn-success btn-custom pull-right" id="show-modal"
                    v-if="is_allowed">Create Tweet
            </button>
        </h1>
        <form-modal></form-modal>
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
                    <a href="#">
                        {{ tweet.title }}
                    </a>

                </h2>
                <div class="entry-meta">
                    <ul class="list-inline">
                        <li class="publish-date">
                            <a href="#">
                                <i class="fa fa-clock-o"></i> {{ tweet.time }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="entry-content">
                    <p align="justify">
                        {{ tweet.description }}
                    </p>
                </div>
                <div>
                    <i @click="showModal(index)" class="fa fa-pencil" style="color: #00a6fc" v-if="is_allowed"></i>
                    <i @click="deleteData(tweet.id, index)" class="fa fa-trash" style="color: red"
                       v-if="is_allowed"></i>
                </div>
            </div>
        </div>
        <infinite-loading :identifier="infiniteId" @infinite="infiniteHandler">
            <div slot="no-more">No more tweets available to show.</div>
        </infinite-loading>
        <vue-toastr ref="mytoast"></vue-toastr>
    </div>
</template>

<script>
    import InfiniteLoading from 'vue-infinite-loading';
    import FormModal from './modal';
    import VueToastr from "vue-toastr";

    export default {
        name: 'tweet-view',
        components: {
            InfiniteLoading,
            'form-modal': FormModal,
            VueToastr,
        },
        props: {
            tweets: {
                required: true
            },
            title: {
                required: true
            },
            is_allowed: {
                required: true,
                default: false
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
        created() {
            var _this = this;
            _this.$eventHub.$on('data-created', (tweet) => {
                _this.results.unshift(tweet);
            });
            _this.$eventHub.$on('data-updated', (tweet, index) => {
                setTimeout(() => {
                    _this.$eventHub.$set(_this.results, index, tweet)
                }, 300);

            });
        },
        methods: {
            infiniteHandler($state) {
                let url = this.baseUrl + '/get-more-tweets'
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

            showModal(param) {
                this.$eventHub.$emit('OpenModal', param, this.results[param]);
            },

            deleteData(id, index) {
                let _this = this;
                if (confirm('Are you sure about to delete this tweet?')) {
                    axios.delete(this.baseUrl + '/account/delete-tweet' + '/' + id)
                        .then((response) => {
                            _this.$toastr.s('SUCCESS MESSAGE', 'Tweet Deleted Successfully!')
                            _this.results.splice(index, 1)
                        })
                        .catch(error => {
                            if (error.response) {
                                console.log(error.response.data);
                                console.log(error.response.status);
                                console.log(error.response.headers);

                            } else if (error.request) {
                                console.log(error.request);
                            } else {
                                console.log('Error', error.message);
                            }
                            console.log(error.config);
                        });
                }

            }
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

    .fa:hover {
        cursor: pointer;
    }

    .listing-news .post-content .entry-title {
        margin-bottom: 5px;
    }

    .entry-meta {
        margin-bottom: 5px;
    }
</style>
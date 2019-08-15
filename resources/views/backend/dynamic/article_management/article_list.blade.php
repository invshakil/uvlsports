@extends('backend.index')

@section('after_css')
    <style>
        .category-button {
            margin-top: 5px;
        }
    </style>
@endsection

@section('content')

    <div id="uvl-app" class="ks-page-content">
        <div class="ks-page-content-body ">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h4 id="form-validation-length">Sort Articles using filter options</h4>
                        <div class="card panel">
                            <div class="card-block">
                                <div class="ks-user-list-view-table">

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <select name="category_id" v-model="filter.category_id"
                                                    @change="filterResult" class="form-control">
                                                <option value="">All Categories</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-3">
                                            <select name="status" v-model="filter.status" @change="filterResult"
                                                    class="form-control">
                                                <option value="">All Status</option>
                                                <option value="0">Pending</option>
                                                <option value="1">Published</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-3">
                                            <select name="author_id" v-model="filter.author_id" @change="filterResult"
                                                    class="form-control">
                                                <option value="">All Author</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <input type="text" name="search"
                                                       v-model="filter.search" @change="filterResult"
                                                       class="form-control"
                                                       placeholder="Search by Title">
                                            </div>
                                        </div>

                                        @if(auth()->user()->role == 1)
                                            <div v-if="selectedId.length > 0" class="col-md-12">
                                                <button class="btn btn-danger btn-sm" @click="deleteAll">Delete All
                                                </button>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="ks-full-table">
                                        <table id="ks-datatable" class="table ks-table-info dt-responsive nowrap"
                                               width="100%" data-pagination="true">
                                            <thead>
                                            <tr>
                                                @if(auth()->user()->role == 1)
                                                    <th>
                                                        <input type="checkbox" v-model="checkbox"
                                                               @click="handleCheckBox($event)">
                                                    </th>
                                                @endif
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Author</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th width="10%">Last Edited By</th>
                                                <th width="14%">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr v-for="(article, index) in results" :key="article.id">
                                                @if(auth()->user()->role == 1)
                                                    <td>
                                                        <input type="checkbox" v-model="selectedId" title
                                                               :value="article.id">
                                                    </td>
                                                @endif
                                                <td>
                                                    <img :src="article.medium_image" class="img-responsive" alt=""
                                                         width="80">
                                                </td>
                                                <td>
                                                    <div v-if="article.status == 0">
                                                        @{{ article.title }}
                                                    </div>
                                                    <div v-else>
                                                        <a :href="'{{ url('/article') }}' + '/' + article.id + '/' + article.slug"
                                                           target="_blank">
                                                            @{{ article.title }}
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        @{{ getCategoryNames(article.category_id) }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="badge badge-info">@{{ article.author.name }}</div>
                                                </td>
                                                <td>
                                                    @{{ article.time_format }}
                                                </td>
                                                <td>
                                                    <span v-if="article.status == 1" class="badge badge-success">Published</span>
                                                    <span v-else class="badge badge-danger">Pending</span>
                                                </td>

                                                <td>
                                                    <div class="badge badge-danger">@{{ article.admin_id === null ?
                                                        'Empty' : article.admin.name }}
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="pull-left">
                                                        <a :href="'{{ url('admin/edit-article') }}' + '/' + article.id"
                                                           class="btn btn-info btn-sm"
                                                        ><i class="la la-pencil-square-o"></i>Edit
                                                        </a>
                                                    </div>

                                                    @if(auth()->user()->role == 1)
                                                        <div class="pull-right">
                                                            <a href="javascript:void(0)"
                                                               @click="deleteData(index)"
                                                               class="btn btn-danger btn-sm"><i
                                                                        class="la la-trash-o"></i> Delete</a>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>


                                            </tbody>
                                        </table>

                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li :class="{disabled: !pagination.prev_page_url}"
                                                    class="page-item">
                                                    <a class="page-link"
                                                       href="#"
                                                       @click="fetchTasks(pagination.prev_page_url)">
                                                        Previous
                                                    </a>
                                                </li>

                                                <li class="page-item disabled">
                                                    <a class="page-link text-dark"
                                                       href="#">
                                                        Page @{{ pagination.current_page }}
                                                        of @{{ pagination.last_page }}
                                                    </a>
                                                </li>

                                                <li :class="{disabled: !pagination.next_page_url}"
                                                    class="page-item">
                                                    <a class="page-link"
                                                       href="#"
                                                       @click="fetchTasks(pagination.next_page_url)">
                                                        Next
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('after_js')
    <link rel="stylesheet" href="{{ asset('vue/vue-loading.min.css') }}">
    <script src="{{ asset('vue/vue.js') }}"></script>
    <script src="{{ asset('vue/axios.js') }}"></script>
    <script src="{{ asset('vue/vue-loading-overlay@2.js') }}"></script>

    <script>
        Vue.use(VueLoading);

        var app = new Vue({
            el: '#uvl-app',
            data: function () {
                return {
                    checkbox: false,
                    categories: [],
                    selectedId: [],
                    results: [],
                    pagination: {},
                    info: {},
                    errors: [],
                    filter: {category_id: '', author_id: '', status: '', search: ''},
                }
            },

            mounted: function () {
                var url = '{{ route('admin.get.articles') }}';
                this.fetch(url)
                let categories = '{!! json_encode($categories) !!}';
                this.categories = JSON.parse(categories)
            },

            methods: {
                handleCheckBox(e) {
                    let isChecked = e.target.checked;
                    if (isChecked) {
                        this.selectedId = this.results.map(function (elm) {
                            return elm.id
                        })
                    } else {
                        this.selectedId = []
                    }
                },

                getCategoryNames(ids) {
                    let catsName = [];
                    idArray = ids.split(',').map(id => parseInt(id));
                    this.categories.forEach(cat => {
                        let object = idArray.includes(cat.id)
                        if (object) {
                            catsName.push(cat.name)
                        }
                    });
                    return catsName.join(', ')
                },

                filterResult() {
                    let queryString = '?category_id=' + this.filter.category_id + '&author_id=' + this.filter.author_id
                        + '&status=' + this.filter.status + '&string=' + this.filter.search;
                    url = '{{ url('admin/get-articles-list') }}' + queryString;
                    this.fetch(url);
                },

                fetch: function (page_url) {
                    var app = this;
                    const loader = this.$loading.show();
                    axios.get(page_url)
                        .then(function (response) {
                            app.results = response.data.data;
                            app.makePagination(response.data);
                            loader.hide();
                        })
                        .catch(function (reason) {
                            console.log(reason)
                        }.bind(this));

                },

                makePagination: function (data) {
                    this.pagination = {
                        current_page: data.current_page,
                        last_page: data.last_page,
                        next_page_url: data.next_page_url,
                        prev_page_url: data.prev_page_url

                    };
                    this.info = {
                        total: data.total,
                        to: data.to,
                        from: data.from
                    }
                },


                deleteData: function (index) {
                    let id = this.results[index].id;
                    if (confirm('Are you sure you want to delete this data?')) {
                        var app = this;
                        const loader = this.$loading.show();
                        route = '{{ url('admin/delete-article/') }}' + '/' + id;
                        axios.get(route)
                            .then(function (response) {
                                app.results.splice(index, 1)
                                loader.hide();
                                toastr.success("Article Info deleted Successfully");
                            })
                            .catch(function (reason) {
                                console.log(reason)
                            }.bind(this));
                    }
                },

                deleteAll() {
                    if (confirm('Are you sure you want to delete this batch of data?')) {
                        route = '{{ url('admin/delete-article/') }}';
                        const loader = this.$loading.show();
                        let app = this;
                        axios.post(route, {ids: this.selectedId})
                            .then(function (response) {
                                let url = '{{ route('admin.get.articles') }}';
                                app.fetch(url)
                                loader.hide();
                                app.selectedId = []
                                app.filter = {category_id: '', author_id: '', status: '', search: ''};
                                toastr.success("Selected Article Info deleted Successfully");
                            })
                            .catch(function (reason) {
                                console.log(reason)
                            }.bind(this));
                    }
                }
            }
        })
    </script>
@endsection
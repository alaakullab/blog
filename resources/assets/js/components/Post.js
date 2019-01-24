import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class Post extends Component {
    constructor(props) {
        super(props);
        this.state = {
            data: [],
            url: '/api/bloger',
            pagination: []
        }
    }


    componentWillMount() {
        this.fetchPosts()
    }

    fetchPosts() {
        let $this = this;
        axios.get(this.state.url).then(response => {
            $this.setState({
                data: response.data.data,
                url: response.data.next_page_url
            })
            $this.makePagination(response.data)
        }).catch(error => {
            console.log(error)
        })
    }

    fetchNextPosts() {
        let $this = this;
        let preData = this.state.data;
        axios.get(this.state.url).then(response => {
            $this.setState({
                data: preData.concat(response.data.data),
                url: response.data.next_page_url
            }, () => {
                $this.makePagination(response.data)
            })
        }).catch(error => {
            console.log(error)
        })
    }

    loadMore() {
        this.setState({
            url: this.state.pagination.next_page_url
        }, () => {
            this.fetchNextPosts()
        })
    }

    makePagination(data) {
        let pagination = {
            last_page: data.last_page,
            next_page_url: data.next_page_url,
            prev_page_url: data.prev_page_url,
        }
        this.setState({
            pagination: pagination
        })
    }

    render() {
        return (
            <div>
                <div>

                    {this.state.data.map((post, i) => (
                            <div className="post" key={post.id}>
                                <h2><a href={"/bloger/post/" + post.id}>{post.title_en}</a></h2>
                                <p className="author-category">By <a href={"/bloger/post/" + post.id}>John Slim</a> in <a
                                    href="">{post.title_en}</a>
                                </p>
                                <hr/>
                                <p className="date-comments">
                                    <a href={"/bloger/post/" + post.id}><i className="fa fa-calendar-o"></i> June 20,
                                        2013</a>
                                    <a href={"/bloger/post/" + post.id}><i className="fa fa-comment-o"></i> 8 Comments</a>
                                </p>
                                <div className="image">
                                    <a href={"/bloger/post/" + post.id}>
                                        <img srcSet={"/storage/" + post.image_post} className="img-responsive"
                                             alt="Example blog post alt"/>
                                    </a>
                                </div>
                                <p className="intro" dangerouslySetInnerHTML={{__html: post.content_en}}/>
                                <p className="read-more">
                                    <a href={"/bloger/post/" + post.id} className="btn btn-primary"> Continue reading</a>
                                </p>
                            </div>
                        )
                    )}
                </div>
                <div className="pages">
                    <p className="loadMore">
                        <a onClick={this.loadMore.bind(this)} className="btn btn-primary btn-lg"><i
                            className="fa fa-chevron-down"></i> Load more</a>
                    </p>
                </div>
            </div>
        );
    }
}

if (document.getElementById('post')) {
    ReactDOM.render(<Post/>, document.getElementById('post'));
}

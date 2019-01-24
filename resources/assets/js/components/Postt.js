import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import fetch from 'isomorphic-fetch';
export default class Post extends Component {
     constructor(props){
 super(props);
 this.state = {
     data: [],
     url: '/api/bloger',
     pagination: [],

 }
 }
    componentWillMount(){
    this.fetchPosts()
    }

 fetchPosts(){
     let $this = this;
     axios.get(this.state.url).then(response => {
         $this.setState({
             data: response.data.data,
             url: response.data.next_page_url 
            
         })
         $this.makePagination(response.data)
     }).catch(error =>{
         console.log(error)
     })
 }

 loadMore(){
     this.setState({
        url:this.state.pagination.next_page_url  
        // per_page:this.state.pagination.per_page +5
 })
     this.fetchPosts()
 }

 makePagination(data){
     let pagination = {
         last_page: data.last_page,
         next_page_url: data.next_page_url,
         prev_page_url: data.prev_page_url,
         per_page: data.per_page,
     }
     this.setState({
         pagination: pagination
     })
 }

    render(){

        return(
                <div className="row">

            <div className="row">

                {this.state.data.map((post, i) => (

                <div className="col-lg-4 col-md-6" key={post.id}>
                    <div className="card h-100">
                        <div className="single-post post-style-1">

                            <div className="blog-image"><img srcSet={"storage/"+post.image_post} alt="Blog Image"/></div>

                            <a className="avatar" href="#"><img src="/design/blog/images/icons8-team-355979.jpg" alt="Profile Image"/></a>

                            <div className="blog-info">

                                <h4 className="title"><a href="#"><b>{post.title_en}</b></a></h4>
                                <p dangerouslySetInnerHTML={{__html: post.content_en}} />
                                <ul className="post-footer">
                                    <li><a href="#"><i className="ion-heart"></i>57</a></li>
                                    <li><a href="#"><i className="ion-chatbubble"></i>6</a></li>
                                    <li><a href="#"><i className="ion-eye"></i>138</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                    )
                )}

            </div>
            
            <button className="load-more-btn" onClick={this.loadMore.bind(this)}><b>LOAD MORE</b></button>

            </div>
        );
    }
}

if (document.getElementById('post')) {
    ReactDOM.render(<Post/>, document.getElementById('post'));
}

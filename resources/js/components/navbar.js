import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom'
import Dashboard from './dashboard'
 
export default class navbar extends Component {
    render() {
       return (
            <nav className="nav-wrapper grey darken-3">
                <div className="container">
                    <Link to='/'>Home</Link>
                    <Link to='/create'>Create</Link>
                    <a href="/" component={Dashboard} >NEW ONE</a>
                </div>
            </nav>
       );
    }
}
 
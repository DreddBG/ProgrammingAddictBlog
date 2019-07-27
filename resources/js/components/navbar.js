import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom'
 
export default class navbar extends Component {
    render() {
       return (
            <nav className="nav-wrapper grey darken-3">
                <div className="container">
                    <Link to='/'>Home</Link>
                    <Link to='/create'>Create</Link>
                </div>
            </nav>
       );
    }
}
 
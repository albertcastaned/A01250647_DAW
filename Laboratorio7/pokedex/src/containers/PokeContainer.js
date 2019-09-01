import React, { Component } from 'react';
import axios from 'axios';
import Lista from '../components/Lista';


class PokeContainer extends Component {

    state = {
        pokeData: []
    }
    componentDidMount()
    {
        axios.get('https://pokeapi.co/api/v2/pokemon/?limit=20')
        .then(result => 
            {
                console.log(result)
                const {results} = result.data;

                this.setState({
                    pokeData: results
                })
            }
        )
        .catch(error => console.log(error));
    }
    render(){

        const {pokeData } = this.state;
        return(
        <Lista pokedata={pokeData} />
        );
    }
}
export default PokeContainer;
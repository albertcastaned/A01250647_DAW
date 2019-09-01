import React, { Component } from 'react';
import axios from 'axios';
import Lista from '../components/Lista';
import Typography from '@material-ui/core/Typography';

class PokeContainer extends Component {

    state = {
        pokeData: []
    }
    componentDidMount()
    {
        axios.get('https://pokeapi.co/api/v2/pokemon/?limit=644')
        .then(result => 
            {
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
        if(pokeData.length === 0)
        {
            return(<Typography color="secondary" gutterBottom component="h1" variant="h1" style={{marginTop:"50px",textAlign: "center",}}>CARGANDO</Typography>)
        }
        return(
        <Lista pokedata={pokeData} />
        );
    }
}
export default PokeContainer;
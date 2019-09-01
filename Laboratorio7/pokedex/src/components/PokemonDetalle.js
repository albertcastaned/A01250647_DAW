import React, { Component } from 'react';
import { Card, CardMedia, CardContent, CardActionArea, Typography } from '@material-ui/core';
import { Grid } from '@material-ui/core';
import Divider from '@material-ui/core/Divider';

class PokemonDetalle extends Component{


    render(){


        var cardStyle = {
            minWidth: "500px",
            minHeight: "500px",
            textAlign: "center",
            boxSizing: "border-box",
            margin: "2em"
            

        };


        const imageLink = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/";

        const data = this.props;
        return(
            <div style={{ marginTop: 40, padding: 10 }}>
             
            <Grid container spacing={10} justify="center">            
                <Card style={cardStyle}>

                <CardActionArea>
                <CardMedia 
                component="img" 
                image={`${imageLink}${data.id}.png?raw=true`}
                alt={data.nombre}
                height= "400px"
                width= "400px"

                />
                    <CardContent>

                        <Typography color="primary" gutterBottom component="h2" variant="h4">
                        #{data.id} {data.nombre.toUpperCase()}

                        </Typography>
                        <Divider variant="inset" style={{margin:10}}/>
                        <Typography variant="h5" color="primary" component="h5">TYPES:</Typography>

                        {
                            data.types.map(item => (
                                <Typography variant="body2" color="primary" component="h6" key={item.type.name}>{(item.type.name).toUpperCase()}</Typography>
                        ))
                        }
                        <Divider variant="inset" style={{margin:10}}/>
                        <Typography variant="h5" color="primary" component="h5" >STATS:</Typography>

                        {
                            data.stats.map(item => (
                                <Typography variant="body2" color="primary" component="h6" key={item.stat.name}>{(item.stat.name).toUpperCase()}: {item.base_stat} / 255</Typography>
                        ))
                        }
                        

 
                    </CardContent>
                </CardActionArea>

             </Card>
            </Grid>
            </div>
        )
    }
}

export default PokemonDetalle;
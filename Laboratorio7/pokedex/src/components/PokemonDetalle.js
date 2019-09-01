import React, { Component } from 'react';
import { Card, CardMedia, CardContent, CardActionArea, Typography } from '@material-ui/core';
import { Grid } from '@material-ui/core';

class PokemonDetalle extends Component{


    render(){


        var cardStyle = {
            minWidth: "700px",
            minHeight: "700px",
            textAlign: "center",
            boxSizing: "border-box",
            margin: "1em"
            

        };
        const imageLink = "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/";

        const data = this.props;
        return(
            <div style={{ marginTop: 20, padding: 5 }}>
             
            <Grid container spacing={10} justify="center">            
                <Card style={cardStyle}>

                <CardActionArea>
                <CardMedia 
                component="img" 
                image={`${imageLink}${data.id}.png?raw=true`}
                alt={data.nombre}
                height= "600px"

                />
                    <CardContent>

                        <Typography gutterBottom component="h2" variant="h3">
                        #{data.id} {data.nombre}
                        </Typography>

                        {
                            data.types.map(item => (
                            <Typography gutterBottom component="h2" variant="h3" key={item.type.name}>{item.type.name}</Typography>
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
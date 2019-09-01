import React from 'react';
import { Card, CardMedia, CardContent, CardActionArea, Typography } from '@material-ui/core';
import { withStyles } from '@material-ui/core/styles';
import { Link } from 'react-router-dom';

function Pokemon({to, id, name, classes, image}){
    
    return(
        <div>
        <Card className={classes.item}>
        <Link to={to}>

            <CardActionArea>
                    <CardMedia className={classes.media} image={image}/>
                    <CardContent>

                        <Typography color="primary" gutterBottom component="h2" variant="h6">
                            #{id}. {name}
                        </Typography>
                    </CardContent>
               
            </CardActionArea>
            </Link>

        </Card>
      </div>
    )
}

export default withStyles({
    
    item:{
        minWidth: "300px",
        textAlign: "center",
        boxSizing: "border-box",
        margin: "1em"
    },

    media:{
        height: "250px"
    }
})(Pokemon);
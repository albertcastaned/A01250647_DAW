import React from 'react';
import AppBar from '@material-ui/core/AppBar';
import Toolbar from '@material-ui/core/Toolbar';
import Typography from '@material-ui/core/Typography';
import Dialog from '@material-ui/core/Dialog';
import DialogContent from '@material-ui/core/DialogContent';
import DialogContentText from '@material-ui/core/DialogContentText';
import DialogTitle from '@material-ui/core/DialogTitle';
import Button from '@material-ui/core/Button';

const NavBar = () => {
    const [open, setOpen] = React.useState(false);

    function handleClickOpen() {
      setOpen(true);
    }
  
    function handleClose() {
      setOpen(false);
    }
    return(
        <div>
            <AppBar position = "static">
                <Toolbar>
                    <Typography variant="h5" color="inherit">
                        Laboratorio 7 - Pokedex
                    </Typography>
                    <Button style={{marginLeft:"auto"}}variant="contained" color="secondary" onClick={handleClickOpen}>
                            Cuestionario
                    </Button>
                </Toolbar>
            </AppBar>
            <Dialog open={open} onClose={handleClose} aria-labelledby="form-dialog-title">
                <DialogTitle id="form-dialog-title">¿Qué es Material Design? </DialogTitle>
                <DialogContent>
                    <DialogContentText>
                        Un estilo de diseño moderno iniciado y desarollado por Google. Se reconoce por el enfasis en la coherencia y en la simplicidad. Su meta es imitar objetos de la vida real con animaciones y tecnicas de sombra. Es utilizado para hacer aplicaciones amigables y responsivas en moviles.
                    </DialogContentText>
                </DialogContent>

            </Dialog>
        </div>
    )
}
export default NavBar;
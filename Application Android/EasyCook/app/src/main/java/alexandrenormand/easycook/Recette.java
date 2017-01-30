package alexandrenormand.easycook;


/**
 * Created by Alexandre on 30/01/2017.
 */

public class Recette {

    private int id;
    private String nom;
    private String descri;

    public Recette(){}

    public Recette(String nom, String descri){
        this.nom = nom;
        this.descri = descri;
    }

    //Déclaration des getters et setter de la classe recette

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getDescri() {
        return descri;
    }


    public void setDescri(String descri) {
        this.descri = descri;
    }

    public String toString(){
        return "ID : "+id+"\nNOM : "+nom+"\nTitre : "+descri;
    }
}
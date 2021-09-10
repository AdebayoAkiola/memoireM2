function LignePanier (code, qte, prix, nom_article)
{

    this.codeArticle = code;
    this.qteArticle = qte;
    this.prixArticle = prix;
    this.nomArticle = nom_article;

    this.ajouterQte = function(qte)
    {
        this.qteArticle += qte;
    }
    this.getPrixLigne = function()
    {
        var resultat = this.prixArticle * this.qteArticle;
        return resultat;
    }
    this.getCode = function()
    {
        return this.codeArticle;
    }
    this.getNomArticle = function()
    {
        return this.nomArticle;
    }
}

function Panier()
{
    this.liste = [];
    this.ajouterArticle = function(code, qte, prix, nom_article)
    {
        var index = this.getArticle(code);
        if (index == -1) this.liste.push(new LignePanier(code, qte, prix, nom_article));
        else this.liste[index].ajouterQte(qte);
    }
    this.getPrixPanier = function()
    {
        var total = 0;
        for(var i = 0 ; i < this.liste.length ; i++)
            total += this.liste[i].getPrixLigne();
        return total;
    }
    this.getArticle = function(code)
    {
        for(var i = 0 ; i <this.liste.length ; i++)
            if (code == this.liste[i].getCode()) return i;
        return -1;
    }
    this.supprimerArticle = function(code)
    {
        var index = this.getArticle(code);
        if (index > -1) this.liste.splice(index, 1);
    }
}

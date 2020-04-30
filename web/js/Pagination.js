class Pagination extends AjaxBuilder
{
    constructor( url, method )
    {
        super( url, method );
        this.pageNumber = 1;
    }

    getPageNumber()
    {
        return this.pageNumber;
    }

    resetPageNumber()
    {
        this.pageNumber = 1;
        this.deleteGetParameter('p');
    }


    increasePageNumber()
    {
        this.pageNumber++;
    }

    pagination()
    {
        //прибавить страничку
        //поменять url, добавляя get параметр
        this.increasePageNumber();
        this.setGetParameter('p', this.getPageNumber());
        super.ajaxRequest();
    }
}
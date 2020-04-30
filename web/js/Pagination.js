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

    checkArray( arr )
    {
        if( arr.length < 9 )
        {
            this.hideButton()
        } else {
            this.unHideButton();
        }
    }


    setPageNumberToUrl()
    {
        this.url = this.url + '&p=' + this.getPageNumber();
    }

    resetPageNumber()
    {
        this.pageNumber = 1;
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
        this.increaseGetParameter('p', this.getPageNumber());
        super.ajaxRequest();
        this.checkArray( this.json );
    }
}
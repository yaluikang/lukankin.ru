class Pagination extends AjaxBuilder
{
    constructor( url, method, moviesQualifier )
    {
        super( url, method, moviesQualifier );
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

    pagination()
    {
        //прибавить страничку
        //поменять url, добавляя get параметр
        this.increasePageNumber();
        this.setPageNumberToUrl();
        super.ajaxRequest();
    }
}
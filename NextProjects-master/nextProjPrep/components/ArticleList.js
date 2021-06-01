import React from 'react'
import ArticleItem from "./ArticleItem"
import ArticleStyles from "../styles/Article.module.css"

const ArticleList = ({article}) => {
    return (
        <div>
            {article.map((articles) => (
                // the name you send from here should be same as the name you receive there
                <ArticleItem articles = {articles}/>
            ))}  
        </div>
    )
}

export default ArticleList

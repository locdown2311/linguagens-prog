<?php
// Padronização de interface para as classes que implementam a busca de informações
interface IGetInfo {
      function getNome();
      function getEmail();
      function getRamal();
      function getSala();
      function getArea(); 
}

# md_pen_tramite_pendente

## Description

<details>
<summary><strong>Table Definition</strong></summary>

```sql
CREATE TABLE `md_pen_tramite_pendente` (
  `id` int(11) NOT NULL,
  `numero_tramite` varchar(255) NOT NULL DEFAULT '',
  `id_atividade_expedicao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci
```

</details>

## Columns

| Name | Type | Default | Nullable | Children | Parents | Comment |
| ---- | ---- | ------- | -------- | -------- | ------- | ------- |
| id | int(11) |  | false |  |  |  |
| numero_tramite | varchar(255) | '' | false |  |  |  |
| id_atividade_expedicao | int(11) | NULL | true |  |  |  |

## Constraints

| Name | Type | Definition |
| ---- | ---- | ---------- |
| PRIMARY | PRIMARY KEY | PRIMARY KEY (id) |

## Indexes

| Name | Definition |
| ---- | ---------- |
| PRIMARY | PRIMARY KEY (id) USING BTREE |

## Relations

![er](md_pen_tramite_pendente.svg)

---

> Generated by [tbls](https://github.com/k1LoW/tbls)

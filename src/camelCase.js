module.exports = (rows) => {
  return rows.map((row) => {
    let replaced = {};
    for (let key in row) {
      const camelCase = key.replace(/([-_][a-z])/gi, ($) =>
        $.toUpperCase().replace("_", "")
      );
      replaced[camelCase] = row[key];
    }
    return replaced;
  });
};
